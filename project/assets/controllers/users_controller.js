import { Controller } from '@hotwired/stimulus';
import { get } from '../api/api.js';
import policy from '../utils/utils.js';

export default class extends Controller {
  connect() {
    let users = [];
    let showedUsers = [];
    let search = '';
    const handleChange = () => {
      search = this.element.querySelector('input#search')?.value ?? '';
      showedUsers = users;
      if (search !== '') {
        showedUsers = users.filter((user) => Object.values(user).some((value) => String(value).includes(search)))
      }
      showUsers();
    }

    const showUsers = () => {
      const tableBody = showedUsers.map(({ id, name, email, gender, status }) => `
          <tr onclick="window.location='user/${id}';">
            <td>${id}</td>
            <td>${name}</td>
            <td>${email}</td>
            <td>${gender}</td>
            <td>${status}</td>
          </tr>
        `).join('');
      this.element.querySelector('tbody').innerHTML = tableBody;
    }

    get('https://gorest.co.in/public/v2/users')
      .then((data) => {
        showedUsers = users = data;
        this.element.innerHTML = `
          <input type="text" id="search" placeholder="Search" value="${search}"></input>
          <table class="users">
            <caption>Users</caption>
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>`;
        this.element.querySelector('input#search').oninput = handleChange;
        showUsers();
      })
      .catch(({ message }) => this.element.textContent = `Error: ${message}!`);
  }
}
