<?php
require 'views/partials/head.php';

require 'views/partials/page_title.php';
?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
       <div id="user-list">
        <h2>Users</h2>
       </div>
    </div>
  </main>

  <script>
    const currentRoute = window.location.pathname;
    const routeID = currentRoute.split('/').pop();

    async function fetchUsers(id) {
      try {
        const response = await fetch(`http://localhost:8000/api/v1/user/${id}`);
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        const users = await response.json();
        displayUsers(users);
      } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
      }
    }

    function displayUsers(users) {
      const userList = document.getElementById('user-list');
      userList.innerHTML = '';
      const userDiv = document.createElement('div');
      userDiv.innerHTML = `
        <h2>${users.name}</h2>
        <p><strong>Email:</strong> ${users.email}</p>
        <p><strong>Username:</strong> ${users.username}</p>
      `;
      userList.appendChild(userDiv);
    }

    fetchUsers(routeID);
  </script>

  <?php
    require 'views/partials/footer.php';
    ?>