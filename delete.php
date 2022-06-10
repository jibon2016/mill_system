<?php

	$sql = "set @autoid :=0; update user set id = @autoid := (@autoid+1); alter table user Auto_Increment = 1;";
?>