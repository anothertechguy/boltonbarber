---
description: Build the WordPress theme assets and cleanly export as .zip
---
To correctly build and package the Bolton Barber theme so the user can smoothly upload it to WordPress without breaking the live site or uploading heavy files:

1. Always make sure to compile the assets first before zipping.
// turbo
2. Run the build command inside the theme directory: `cd bolton-barber-theme && npm install && npm run build`
// turbo
3. Go back to project root and zip the `bolton-barber-theme` folder excluding non-production folders: `cd .. && zip -r bolton-barber-theme.zip bolton-barber-theme -x "bolton-barber-theme/node_modules/*" -x "bolton-barber-theme/.git/*" -x "bolton-barber-theme/.github/*" -x "bolton-barber-theme/.agents/*"`
// turbo
4. Move the finished zip to the Desktop: `mv bolton-barber-theme.zip ~/Desktop/bolton-barber-theme-upload.zip`
5. Inform the user that the production-ready zip has been cleanly exported to their Desktop as `bolton-barber-theme-upload.zip` and that they should upload that file to WP via Appearance > Themes.
