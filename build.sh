cd "$(dirname "$0")"

rm -rf node_modules
rm -f **/*.html
rm -f *.html
rm -f **/*.js
rm -f *.js
rm -f **/*.css
rm -f *.css
rm -f **/*.pdf
rm -f *.pdf
rm -f **/*.map
rm -f *.map
rm -f **/*.png
rm -f *.png
rm -f **/*.svg
rm -f *.svg
rm -f **/*.jpg
rm -f *.jpg
rm -f **/*.ico
rm -f *.ico

git checkout vuejs-bootstrap-vue
yarn install
yarn build
git checkout php
cp -r dist/ ./
