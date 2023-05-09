<?php
echo "hello world!";
echo ""
echo substr( sprintf( '%o', fileperms(".")), -4);
touch('./data.json');
?>
