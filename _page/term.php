<?php
$term_s = $connect->query("SELECT * FROM term");
$term_q = $term_s->fetch_assoc();

echo $term_q['term']; 
?>