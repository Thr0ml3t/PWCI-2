# PHP Games Dashboard

PHP Games Dashboard is a simple web application that displays high-rated video games (rating >= 4.9) using a modern TailwindCSS interface. The application consists of vanilla PHP with no build process required.

Always reference these instructions first and fallback to search or bash commands only when you encounter unexpected information that does not match the info here.

## Working Effectively

### Prerequisites
- PHP 8.3+ is required and already installed in the environment
- No additional dependencies or packages needed
- Application uses external CDN resources for TailwindCSS styling

### Validate and Test the Application
- Check PHP syntax: `php -l index.php && php -l index.view.php` -- completes in <0.1 seconds
- Run the web application: `php -S localhost:8000` -- starts in <1 second 
- Test functionality: `curl -s http://localhost:8000` or open browser to http://localhost:8000
- Direct execution test: `php index.php` -- completes in <0.1 seconds, outputs full HTML

### Development Server
- Start: `php -S localhost:8000`
- The server starts immediately (< 1 second)
- Access via: http://localhost:8000
- Stop: Ctrl+C or kill the process

## Validation

### Manual Validation Requirements
ALWAYS test the complete application functionality after making changes:
1. **Start the development server**: `php -S localhost:8000`
2. **Open the application** in browser at http://localhost:8000
3. **Verify the dashboard displays**: Should show "Dashboard" header with navigation
4. **Check game filtering works**: Only games with rating >= 4.9 should appear:
   - "The Last of Us" (rating: 5.0)
   - "Ghost of Tsushima" (rating: 4.9)
5. **Verify UI elements**: Navigation bar, user profile dropdown, responsive mobile menu
6. **Test responsiveness**: Application should work on different screen sizes

### Code Validation
- Always run syntax check before testing: `php -l index.php && php -l index.view.php`
- Test direct execution: `php index.php` should output complete HTML without errors
- NEVER CANCEL: All commands complete in under 1 second, no long timeouts needed

## Common Tasks

### Adding New Games
Edit the `$games` array in `index.php`:
```php
$games = [
    // Add new game entry here
    [
        'title' => 'Game Title',
        'release_date' => 'YYYY/MM/DD', 
        'rating' => 4.9,
        'author' => 'Developer Name'
    ]
];
```

### Modifying Rating Filter
Edit line 42-44 in `index.php`:
```php
$result = array_filter($games, function($game) {
    return $game['rating'] >= "4.9"; // Change this value
});
```

### UI Modifications
Edit `index.view.php` for:
- HTML structure changes
- TailwindCSS styling updates
- Navigation menu modifications
- Game display formatting

## Repository Structure

### File Overview
```
.
├── index.php           # Main PHP logic with game data and filtering
├── index.view.php      # HTML template with TailwindCSS styling
└── .github/
    └── copilot-instructions.md
```

### Key Files
- **index.php**: Contains games array, filtering logic (`rating >= 4.9`), and includes the view
- **index.view.php**: Complete HTML document with TailwindCSS navigation and game display

### External Dependencies
- TailwindCSS Browser: https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4
- TailwindPlus Elements: https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1
- These are loaded via CDN and may be blocked in some environments, but core functionality works without them

## Troubleshooting

### Common Issues
- **CDN Resources Blocked**: External CSS/JS may be blocked in sandboxed environments, but core PHP functionality works
- **Port Already in Use**: If port 8000 is busy, use different port: `php -S localhost:8001`
- **Syntax Errors**: Always run `php -l filename.php` to check syntax before testing

### Expected Behavior
- Application should display exactly 2 games (The Last of Us, Ghost of Tsushima)
- Both games have ratings >= 4.9 (5.0 and 4.9 respectively)
- UI should show dark theme dashboard with navigation and game cards
- Mobile responsiveness should work (hamburger menu for small screens)

## Development Guidelines

### Making Changes
1. **Always validate syntax first**: `php -l index.php`
2. **Test immediately**: Start server with `php -S localhost:8000`
3. **Verify in browser**: Check http://localhost:8000 shows expected changes
4. **Test edge cases**: Verify filtering still works correctly
5. **Check responsiveness**: Test on different viewport sizes if UI changes made

### Code Style
- Follow existing PHP formatting in the files
- Use array syntax consistent with existing code
- Maintain HTML indentation and structure in view file
- Keep TailwindCSS class organization readable

### Performance Notes
- All operations complete in under 1 second
- No build process or compilation required
- Changes are immediately visible after server restart
- File sizes are minimal (< 10KB total)