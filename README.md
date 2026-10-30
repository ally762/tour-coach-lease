# Tour Coach Lease — website

This project has **two versions of the same site**, sharing the same CSS and JavaScript.

## 1. HTML / CSS / JavaScript (root folder) → GitHub Pages
`index.html`, `coaches.html`, `services.html`, `contact.html`, `assets/`

Live on GitHub Pages:
1. Push this folder to a GitHub repository.
2. Repo → **Settings → Pages** → Source: *Deploy from a branch* → Branch `main`, folder `/ (root)` → Save.
3. After a minute the site is live at `https://<username>.github.io/<repo>/`.

The quote form uses **FormSubmit.co** (no server needed). The first time someone submits it,
FormSubmit sends an activation email to `info@tourcoachlease.com` — click the link once and every
request after that arrives in that inbox. To change the inbox, edit the `action` in `contact.html`.

## 2. PHP version (`php/` folder) → any PHP hosting (Hostinger, cPanel, etc.)
`php/index.php`, `coaches.php`, `services.php`, `contact.php`, `send-quote.php`, `includes/`

- Header, footer and CTA are shared PHP includes in `php/includes/`.
- Phone, email and the quote inbox are set in `php/includes/config.php`.
- `send-quote.php` validates the form, emails the request and saves a copy to `php/data/quotes.log`.
- Run locally: `cd php && php -S localhost:8000`, then open http://localhost:8000

GitHub Pages cannot run PHP, so use the root HTML version there and the `php/` folder on a PHP host.

## Photos
Images in `assets/img/` were cropped from the design screenshots and are low-resolution.
Replace them with full-size photos using the same file names (in both `assets/img/` and `php/assets/img/`).
