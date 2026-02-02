<?php
for ($i = 1; $i <= 10; $i++) {

    echo"<h1> 2 <sup> $i = ".(2<<$i)."</h1>";
}
$ficheros = `ls -la`;
echo "<pre>$ficheros</pre>";
?>