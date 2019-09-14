<?php
	 function cekUsername($username) {
		  return preg_match('/^[a-z A-Z 0-9]{5,9}/i',$username) ;
	 }

	 // Cara menggunakan fungsi di atas
	 if (cekUsername("yDsd45")) {
		 echo "Username true" ;
	 } else {
		 echo "Username false" ;
	 }
?>
</br>
<?php
	 function cekPassword($password) {
			return preg_match('/^[A-Z a-z]{1,}[@]{1,}[0-9]{1,}$/i',$password) ;
	 }
	 // Cara menggunakan fungsi di atas
	 if (cekPassword("aB@67")) {
		 echo "Password true" ;
	 } else {
		 echo "Password false" ;
	 }
?>
