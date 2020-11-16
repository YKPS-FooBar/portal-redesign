cd "$(dirname "$0")"

rm -rf node_modules
rm -rf uploads
rm -rf dist css js img images
find . -name '*.html' -delete
find . -name '*.js' -delete
find . -name '*.css' -delete
find . -name '*.pdf' -delete
find . -name '*.map' -delete
find . -name '*.png' -delete
find . -name '*.svg' -delete
find . -name '*.jpg' -delete
find . -name '*.ico' -delete
