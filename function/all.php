	function getavatar($usercheck){
		$sql= 'SELECT * FROM `user` WHERE username="'.$usercheck.'"';
		$result = mysqli_query($db,$sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row["avatar"];
			}
		}
	}