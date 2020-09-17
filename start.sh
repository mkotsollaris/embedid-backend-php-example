case "$OSTYPE" in
  darwin*)  open ./index.html ;; 
  linux*)   xdg-open ./index.html ;;
  msys*)    start ./index.html ;;
  *)        echo "just manually open index.html :)" ;;
esac

php -S 127.0.0.1:8000
