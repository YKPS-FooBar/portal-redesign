rm */*.html
rm */*.js
rm */*.css
rm */*.pdf
rm */*.map
rm */*.png
rm */*.svg
rm */*.jpg
rm */*.ico

git checkout vuejs-bootstrap-vue
yarn build
git checkout php
cp -r dist/ ./
