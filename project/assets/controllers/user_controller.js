import { Controller } from '@hotwired/stimulus';
import { get, post } from '../api/api.js';
import policy from '../utils/utils.js';

export default class extends Controller {
  static values = {
    id: Number,
  };

  connect() {
    let posts = [];

    const showPosts = () => {
      this.element.innerHTML = `<table class="user">
        <caption>Posts</caption>
        <tbody>
          ${posts.map(({ title, body }) => `
            <tr>
              <td>${policy.createHTML(title)}</td>
              <td>${policy.createHTML(body)}</td>
            </tr>
          `).join('')}
          <tr>
            <td><input type="text" id="title" placeholder="Title" required="required"></input></td>
            <td><textarea id="body" required="required"></textarea></td>
            <td class="add">Add</td>
          </tr>
        </tbody>
      </table>`;
      this.element.querySelector('td.add').onclick = handleClick;
    };

    const handleClick = () => {
      const title = document.querySelector('#title').value;
      const body = document.querySelector('#body').value;

      post(
        `https://gorest.co.in/public/v2/users/${this.idValue}/posts`,
        { title, body }
      ).then((data) => {
        posts.push(data);
        showPosts();
      }).catch(({ message }) => this.element.textContent = `Error: ${message}!`);
    };

    get(`https://gorest.co.in/public/v2/users/${this.idValue}/posts`)
      .then((data) => {
        posts = data;
        showPosts();
      }).catch(({ message }) => this.element.textContent = `Error: ${message}!`);
  }
}
