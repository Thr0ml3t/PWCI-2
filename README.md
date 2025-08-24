# PWCI-2 - Games Dashboard

## Project Overview

This is a simple PHP web application that displays a games dashboard with filtering capabilities. The application features a modern, responsive interface built with TailwindCSS that showcases video games with ratings of 4.9 or higher.

### Features
- Displays a curated list of high-rated video games
- Modern dark-themed UI with responsive design
- Games filtering based on rating criteria
- Clean, professional dashboard layout

## Prerequisites

- Windows operating system
- XAMPP (includes Apache, MySQL, PHP, and Perl)
- Basic understanding of web development

## Setup Instructions for Windows with XAMPP

### Step 1: Download and Install XAMPP

1. **Download XAMPP:**
   - Visit the official XAMPP website: https://www.apachefriends.org/
   - Download the latest version for Windows
   - Choose the installer that includes PHP 7.4 or higher

2. **Install XAMPP:**
   - Run the downloaded installer as Administrator
   - Choose installation directory (default: `C:\xampp`)
   - Select components to install (ensure Apache and PHP are selected)
   - Complete the installation wizard

### Step 2: Start XAMPP Services

1. **Launch XAMPP Control Panel:**
   - Open XAMPP Control Panel as Administrator
   - You can find it in Start Menu → XAMPP → XAMPP Control Panel

2. **Start Apache:**
   - Click the "Start" button next to Apache
   - The Apache status should turn green and show "Running"
   - Default port is 80 (you can change this if there are conflicts)

### Step 3: Setup Project Files

1. **Locate the htdocs folder:**
   - Navigate to your XAMPP installation directory
   - Open the `htdocs` folder (usually `C:\xampp\htdocs`)

2. **Create project directory:**
   - Create a new folder inside `htdocs` called `pwci-2`
   - Full path should be: `C:\xampp\htdocs\pwci-2`

3. **Copy project files:**
   - Copy `index.php` and `index.view.php` to the `pwci-2` folder
   - Your folder structure should look like:
     ```
     C:\xampp\htdocs\pwci-2\
     ├── index.php
     └── index.view.php
     ```

### Step 4: Access the Application

1. **Open your web browser**
2. **Navigate to:** `http://localhost/pwci-2`
3. **You should see the Games Dashboard with filtered high-rated games**

## Adding PHP to Windows PATH (Optional)

To use PHP commands directly from Command Prompt or create simple dev servers:

### Method 1: Through System Properties

1. **Open System Properties:**
   - Right-click "This PC" → Properties
   - Click "Advanced system settings"
   - Click "Environment Variables"

2. **Edit PATH variable:**
   - In "System variables", find and select "Path"
   - Click "Edit"
   - Click "New"
   - Add: `C:\xampp\php` (or your XAMPP installation path + \php)
   - Click "OK" to save

3. **Verify installation:**
   - Open Command Prompt
   - Type: `php --version`
   - You should see PHP version information

### Method 2: Using PowerShell (Temporary)

```powershell
$env:PATH += ";C:\xampp\php"
php --version
```

### Creating a Simple Dev Server with PHP Command

Once PHP is in your PATH, you can start a development server directly:

```bash
# Navigate to your project directory
cd C:\xampp\htdocs\pwci-2

# Start PHP development server
php -S localhost:8000

# Access via: http://localhost:8000
```

## Troubleshooting

### Common Issues and Solutions

#### 1. Apache Won't Start
**Problem:** Apache service fails to start or shows "Port 80 in use"

**Solutions:**
- **Check for conflicting services:**
  - Stop IIS if running: `net stop iisadmin`
  - Stop Skype or change its port usage
- **Change Apache port:**
  - In XAMPP Control Panel, click "Config" next to Apache
  - Select "httpd.conf"
  - Find `Listen 80` and change to `Listen 8080`
  - Restart Apache
  - Access via: `http://localhost:8080/pwci-2`

#### 2. PHP Files Download Instead of Execute
**Problem:** Browser downloads .php files instead of executing them

**Solutions:**
- Ensure Apache is running
- Verify you're accessing via `http://localhost` not opening files directly
- Check that PHP module is loaded in Apache

#### 3. "Access Denied" or Permission Errors
**Problem:** Cannot access files or folders

**Solutions:**
- Run XAMPP Control Panel as Administrator
- Check folder permissions in `htdocs`
- Ensure Windows Firewall allows Apache

#### 4. Blank Page or No Output
**Problem:** Page loads but shows nothing

**Solutions:**
- Check for PHP syntax errors
- Enable error reporting by adding to top of `index.php`:
  ```php
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ```

#### 5. CSS/Styling Not Loading
**Problem:** Page appears without styling

**Solutions:**
- Ensure internet connection (TailwindCSS loads from CDN)
- Check browser console for blocked resources
- Verify file paths are correct

### Getting Help

If you encounter issues not covered here:

1. **Check XAMPP Control Panel logs:**
   - Click "Logs" next to Apache for error details

2. **PHP Error Logs:**
   - Located at: `C:\xampp\php\logs\php_error_log`

3. **Community Resources:**
   - XAMPP Community Forum: https://community.apachefriends.org/
   - PHP Documentation: https://www.php.net/docs.php

## Development Tips

- **File Changes:** No need to restart Apache when modifying PHP files
- **Database:** MySQL is available if you need database functionality
- **Extensions:** Additional PHP extensions can be enabled in `php.ini`
- **Virtual Hosts:** Consider setting up virtual hosts for multiple projects

## Project Structure

```
pwci-2/
├── index.php          # Main application logic and data
├── index.view.php     # HTML template with TailwindCSS
└── README.md          # This documentation file
```

---

**Happy coding!** If you encounter any issues or have suggestions for improvements, please feel free to open an issue or contribute to the project.