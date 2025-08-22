async function customFetch(url, options = {}) {
  return fetch(url, options)
    .then((response) => {
      if (!response.ok)
        throw new Error(`Response status: ${response.status}`);
      return response.json();
    })
}

export async function get(url) {
  return customFetch(url);
}

export async function post(url, data) {
  return customFetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'Authorization': 'Bearer be7b4af3f0d3276c8066699798c52e844633f2d43072694497638bef065f4b02',
      'Content-Type': 'application/json'
    }
  })
}