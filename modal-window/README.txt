=== Modal Window - create popup modal window ===
Contributors: Wpcalc, lobov
Donate link: https://wow-estore.com/item/wow-modal-windows-pro/
Tags: modal, modal window, modal popup, lightbox, popup
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 6.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress popup plugin for easily creating a popup and modal window with any kind of content and settings.

== Description ==

Use the free WordPress popup plugin "Modal Window" to quickly and easily create informative popups. Add the text and media you need, insert shortcodes of forms and much more. Change the behavior of the display of modal windows depending on the user's actions on the page.

The Modal Window is the unique tool for free use. With its help you can add bright information popup messages to the site, warn visitors about various promotions, display contact forms to increase the conversion of the resource. The WordPress popup plugin will allow you to set the data display in the new format.

Create modal windows and insert any kind of content.

= Main features =

The WordPress plugin Modal Window will help you quickly get the attention of visitors. Its functionality will make it possible to implement high-quality modal windows for any query.

* **Unlimited Modals:** Create as many modal windows as you need without restrictions.
* **HTML Content Editor:** Easily add and format text, images, and other content within your modal windows using a built-in HTML editor.
* **Modal Shortcodes:** Use shortcodes to insert modal windows into posts, pages, or widgets, making them versatile and easy to implement
* **Place Any Kind of Content:** Insert text, images, videos, and other content types within your modal windows to deliver your message effectively.
* **Modal Style:** Apply basic styling to your modal windows to match your site's design.
* **Modal Location:** Set the position of your modal windows on the screen (e.g., center, top, bottom).
* **Open Triggers:** Choose from various triggers to open modal windows, including click, auto, hover, exit, and scroll events.
* **Basic Animations:** Utilize simple fade animation to enhance the appearance of your modal windows.
* **Overlay and Esc Key:** Allow users to close modal windows by clicking on the overlay or pressing the Esc key.
* **Shortcode and Everywhere:** Control where your modals appear using shortcodes or set them to display across the entire site.
* **Hide on Smaller Screens:** Option to hide modal windows on smaller screens, ensuring they do not disrupt mobile user experience.
* **Hide on Larger Screens:** Option to hide modal windows on larger screens, providing control over where modals are shown.

--

Discover even **more features with the Pro version** of the Modal Window plugin, available at [wow-estore.com](https://wow-estore.com/item/wow-modal-windows-pro/).

--

The free Modal Window plugin is the best tool to create information pop-up blocks quickly and easy. It allows you to display any kind of content on the page. Add and edit text messages, shortcodes of various forms, images and other media files with its help.

= Common use cases =
The free version of the Modal Window plugin is versatile and can be used in various scenarios to enhance your website’s functionality and user engagement.

**Promotions and Announcements**

* Special Offers: Display limited-time promotions or discounts to capture visitor interest and drive sales.
* Event Announcements: Inform users about upcoming events, webinars, or product launches directly on your site.

**Lead Generation**

* Newsletter Sign-Ups: Create pop-ups to encourage visitors to subscribe to your newsletter, helping you grow your email list.
* Contact Forms: Embed contact forms within modals to make it easy for visitors to reach out to you without leaving the page.

**Content Display**

* Important Information: Highlight critical updates or information, such as privacy policies or terms of service changes.
* Multimedia Content: Showcase videos, image galleries, or other multimedia content in a visually appealing modal window.

**User Interaction**

Surveys and Feedback: Collect user feedback or conduct surveys to gather insights and improve your services.

**Navigation and Guidance**

* Site Tours: Guide new users through your website’s features with step-by-step tutorials in modal windows.
* Pop-Up Menus: Create additional navigation options with pop-up menus that enhance user experience.

= Use with other FREE plugins to maximize your results =
* [Counter Box](https://wordpress.org/plugins/counter-box/) - Quickly and easily create countdowns, counters, and timers with a live preview.
* [Buttons](https://wordpress.org/plugins/buttons/) - Easily create beautiful, customizable standard, floating, and social sharing buttons. Increase click-through rates and enhance your user experience.
* [Calculator Builder](https://wordpress.org/plugins/calculator-builder/) - A simple way to create an online calculator.
* [Floating Button](https://wordpress.org/plugins/floating-button/) - WordPress plugin designed to generate and manage sticky Floating Buttons, capable of performing any defined actions on your website.
* [Herd Effects](https://wordpress.org/plugins/counter-box/) - Designed to create a “sense of queue” or “herd effect”, motivating the visitors of the page to perform any actions.

**Try other our plugin for create menu:**

*   [Floating Button](https://wordpress.org/plugins/floating-button/) - Easily generate and manage sticky floating buttons.
*   [Sticky Buttons](https://wordpress.org/plugins/sticky-buttons/) - Easily create sticky buttons with varying complexity.
*   [Bubble Menu](https://wordpress.org/plugins/bubble-menu/) - Create an awesome circle menu with icons.
*   [Float menu](https://wordpress.org/plugins/float-menu/) - Easily create floating menus with varying complexity.
*   [Side Menu](https://wordpress.org/plugins/side-menu-lite/) - Provide any extra content and functionality with the attention-grabbing side menu.

= Support =
Search for answers and ask your questions at [support center](https://wordpress.org/support/plugin/modal-window)

== Installation ==
* Installation option 1: Find and install this plugin in the `Plugins` -> `Add new` section of your `wp-admin`
* Installation option 2: Download the zip file, then upload the plugin via the wp-admin in the `Plugins` -> `Add new` section. Or unzip the archive and upload the folder to the plugins directory `/wp-content/plugins/` via ftp
* Press `Activate` when you have installed the plugin via dashboard or press `Activate` in the `Plugins` list
* Go to `Modal Window` section that will appear in your main menu on the left
* Click `Add new` to create your first modal window
* Setup your modal window
* Click Save
* Copy and paste the shortcode, such as [Modal-Window id=1] to where you want the modal window to appear.
* If you want it to appear everywhere on your site, you can insert it for example in your `header.php`, like this: `<?php echo do_shortcode('[Modal-Window id=1]');?>`

== Frequently Asked Questions ==
= How to create a Modal window?  =

* Click `Add new` to create your first modal window
* Setup your modal window
* Click Save
* Copy and paste the shortcode, such as [Modal-Window id=1], to where you want the modal window to appear. For Example: insert shortcode [Modal-Window id=1] into a page/post content
* If you want it to appear everywhere on your site, you can insert it for example in your `footer.php`, like this: `<?php echo do_shortcode('[Modal-Window id=1]');?>`

= Prevent page jumping to top when opening modal =

If the page jumping to the top when opening a modal via a link lower down on a page add the next CSS code:

`html.no-scroll, body.no-scroll {
    overflow: visible !important;
}`

In the site dashboard:

1. Go to the page ‘Appearance’->’Customize’
2. Click ‘Additional CSS’
3. Add CSS code
4. Click ‘Publised’

= How to close the modal window using custom button =

You can сlose popup via adding to the element:

* Class - wow-modal-close-X, like `<span class="wow-modal-close-X">Close Popup</span>`
* ID - wow-modal-close-X, like `<span id="wow-modal-close-X">Close Popup</span>`
* URL - #wow-modal-close-X, like `<a href="#wow-modal-close-X">Close Popup</a>`

Where X = Modal window ID

= The modal window on the frontend does not change after making changes to the settings =

If you use the cache (W3 Total Cache, WP Super Cache, WP Rocket) or minify plugins (Autoptimize, Fast Velocity Minify) try deactivate them and tested the modal window.
If the modal window shows correctly, reset the cache of these plugins.

= The modal window not show =

1. Check whether you have inserted a modal window on the page. You can insert the modal window via shortcode or option 'Publish' -> 'All posts and pages'
2. Check that the site's protocol matches WordPress Address (URL) & Site Address (URL) in the Settings-> General

= How to open a modal window clicking on the link?  =

* Create a modal window
* Copy and paste the shortcode, such as [Modal-Window id=1], to where you want the modal window to appear.
* Insert a link like `<a href="https://wow-estore.com/#wow-modal-id-1">Open Modal Window</a>`  to the page.

= How to open a modal window clicking on the button ?  =
* Create a modal window
* Copy and paste the shortcode, such as [Modal-Window id=1], to where you want the modal window to appear.
* Insert a button like `<button id="wow-modal-id-1">Open Modal Window</button>`  to the page.

= Can I insert a shortcode into the modal window? =
Yes, you can inert any shortcode into the content of modal window

= The modal window doesn't scrolling =
This happens if the height of the modal is set to auto and is less than the height of the screen.

To solve this problem:

* Set the value to option "Modal Height"
* Select the value "Modal Height" % or px, but not auto


== Screenshots ==
1. Overview
2. Create modal windows & insert any content
3. Insert a form (together with Wow Forms plugin)
4. Create exit intent popups. Retain users on your website or at least offer the abandoning users something valuable to capture their emails.
5. Setup any widgets. Insert any other plugins' shortcodes.
6. Create a phone call request widget
7. Use for showing ads
8. Modal window setup example
9. Features
10. Pro version features

== Upgrade Notice ==

= 5.0 =
If you use the cache plugin, reset the cache completely.

== Changelog ==
= 6.2.2 =
* Improved: Refactored AdminActions class for better performance and readability
* Improved: Reordered condition checks for better execution performance
* Updated: Added strict type hinting for method arguments in AdminActions

= 6.2.1 =
* Improved: Reorganized method order in DBManager class for better readability and maintenance
* Improved: Minor SQL formatting for consistency
* Cleaned: Minor code style improvements according to WordPress Coding Standards (WPCS)

= 6.2 =
* Added: attribute aria-live to notify screen readers of the popup’s sudden appearance.
* Implemented: WCAG compliance improvements for the modal window.

= 6.1.6 =
* Fixed: shortcode 'iframeBox'

= 6.1.5 =
* Fixed: Nonce verification logic for improved security.

= 6.1.4 =
* Updated: UI elements
* Updated: FontAwesome Icon 6.7.1

= 6.1.3 =
* Added: fullscreen option for shortcode video.
* Fixed: option 'Show once'.

= 6.1.2 =
* Fixed: main icon in the admin menu.
* Fixed: minor bugs
* Update: translate file
* Fixed: save the form in modal window content

= 6.1.1 =
* Fixed: minor bugs with escaping

= 6.1 =
* Added: Control the display of the plugin in the dashboard based on users' roles

= 6.0.6 =
* Fixed: Side options of the modal window.

= 6.0.5 =
* Added: Loading Lazy to iframes

= 6.0.4 =
* Updated: FontAwesome Icon to version 6.6
* Fixed: Escaping the shortcode for icon
* Fixed: font family for fonticonpicker

= 6.0.2 =
* Fixed: Mobile rules were not functioning correctly.

= 6.0.1 =
* Fixed: download script ModalWindow

= 6.0 =
*   **Added:** Title: add colors and font settings.
*   **Added:** Close Button: add colors and font settings.
*   **Added:** Shadow Style.
*   **Added:** Scrollbar Style - Customize the scrollbar for the modal window if the content is longer, allowing for a more consistent and visually appealing user experience.
*   **Added:** Floating Button: icon for button.
* **Added:** Tag, link, and button 'Duplicate' in the modal window option.
*   **Added:** Open modal window content in HTML Editor.
* **Changed:** Live modal window preview.
*   **Improvement:** Refreshed Interface - Revamped the plugin's dashboard page style for a more intuitive and user-friendly experience.
*   **Fixed:** Diligently addressed minor bugs to ensure a flawless plugin experience.

= 5.3.10 =
* Fixed: minor bug with nonce

= 5.3.9 =
* Fixed: shortcode for icon

= 5.3.8 =
* Fixed: path to the plugin class files

= 5.3.7 =
* Fixed: dynamic property for PHP 8.2

= 5.3.6 =
* Fixed: issue in escaping shortcode attributes

= 5.3.5 =
* Fixed: minor bug in wow-plugin

= 5.3.4 =
* Fixed: scroll on mobile devices

= 5.3.3 =
* Fixed: button 'Shortcode' for popup content

= 5.3.2 =
* Fixed: minor bugs

= 5.3.1 =
* Fixed: scroll modal content in mobile devices

= 5.3 =
* Added: shortcode for CLose Button
* Added: shortcode for video
* Added: shortcode for iframe
* Fixed: minor bug with delete the modal window

= 5.2.3 =
* Fixed: save emoji in modal window content
* Fixed: minor bug

= 5.2.2 =
* Fixed: minor bug on main plugin page

= 5.2.1 =
* Fixed: minor bug

= 5.2 =
* Added: option Export/Import
* Fixed: minor bugs

= 5.1.1 =
* Fixed: demo url

= 5.1 =
* Updated: Font Awesome Icons to version 5.14
* Fixed: minor bugs

= 5.0.6 =
* Fixed: check, if jQuery is ready

= 5.0.5 =
* Fixed: fix conflict with Divi theme

= 5.0.4 =
* Fixed: save to database

= 5.0.3 =
* Fixed: fix conflict with form plugins

= 5.0.2 =
* Fixed: Mobile Rules

= 5.0 =
* Added: Live Preview Builder
* Added: Test mode
* Added: Activate/Deactvate the modal window
* Changed: Admin style
* Optimized: scripts and styles

= 4.0.3 =
Fixed: link to the Settings

= 4.0.2 =
Fixed: option 'Show only once'

= 4.0.1 =
Fixed: using old shortcode

= 4.0 =
* Added: Options for modal window style: z-index, position, overlay, top location, border style, content font-size
* Added: Title of the modal window
* Added: Icon generation
* Added: Shortcodes for columns
* Added: Screen width control for different devices
* Added: Pot file for translate
* Changed: Admin style
* Changed: Database of the plugin

= 3.2.2 =
* Fixes: Gutenberg Shortcode

= 3.2.1 =
* Deleted: quantity constraint

= 3.2 =
* Added: Function for showing modal windows on all posts and pages

= 3.1.2 =
* Fixed: Showing a modal window when scrolled

= 3.1.1 =
* Fixed: Save a modal window

= 3.1 =
* Added: Support page

= 3.0 =
* Added: show a modal window on hover
* Changed: Admin style
* Fixed: General style


= 2.5 =
* Fixed: Open a modal window, when the window is scrolled
* Fixed: Open a modal window, when the user tries to leave the page.

= 2.4 =
* Fixed: Working with cookies
* Fixed: Saving to the database.


= 2.3.4 =

* Added: FAQ.
* Fixed: code.

= 2.3.3 =

* Fix: Show a modal window with cookies.


= 2.3.2 =

* Fix: Modal Window style.
* Fix: Admin style.

= 2.3.1 =

* Fix: Admin style.


= 2.3 =

* Add: Button for call a modal window.
* Add: Mobile style settings.
* Change: Image of close button.
* Change: The admin style of modal window.


= 2.2.1 =
* Fix: close a modal window on mobile

= 2.2 =
* Fix: Style. The width of the modal window as a percentage
* Fix: Verifying access to the folder 'asset'.
* Fix: Optimized code.

= 2.1.2 =
* Fixed script (click on link)

= 2.1.1 =
* Fixed include modal windows

= 2.1 =
* Fixed show modal window


= 2.0 =
* Add new options
* Fixed code
* Change style

= 1.3 =
* Fixed code
* Change style

= 1.2.1 =
* Edited contacts

= 1.2 =
* Fixed display a modal window


= 1.1 =
* Fixed display a modal window
* Add option closing modal window


= 1.0 =
* Initial release