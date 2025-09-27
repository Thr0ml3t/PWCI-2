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
    async function viewUser(id) {
      window.location.href = `http://localhost:8000/users/${id}`;
    }
    async function fetchUsers() {
      try {
        const response = await fetch('http://localhost:8000/api/v1/user');
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
      userList.innerHTML = ''; // Clear existing content

      if (users.length === 0) {
        userList.innerHTML = '<p>No users found.</p>';
        return;
      }

      users.forEach(user => {
        const userDiv = document.createElement('div');
        userDiv.classList.add('mb-4', 'p-4', 'bg-gray-800', 'rounded');

        userDiv.innerHTML = `
          <h3 class="text-xl font-bold mb-2">${user.name}</h3>
          <p><strong>Email:</strong> ${user.email}</p>
          <p><strong>Age:</strong> ${user.age}</p>
          <p><button onclick="viewUser(${user.id})">View Details</button></p>
        `;

        userList.appendChild(userDiv);
      });
    }

    fetchUsers();
  </script>

  <?php
    require 'views/partials/footer.php';
    ?>