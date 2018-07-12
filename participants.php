<?php
header('Content-type: text/html; charset=utf-8');
require(str_replace('//', '/', dirname(__FILE__).'/')."includes/cfgMySQL.inc.php");
require(str_replace('//', '/', dirname(__FILE__).'/')."includes/cl_connect_mysql.inc.php");
$phDB = new dbConnectMySQL();
$phDB->connect();
$result = $phDB->liendb->query("SELECT id, nom, prenom, courriel, telephone FROM Participant");
echo "<div class=\"page-header\">\n";
echo "	<h1>Pârticipants</h1>\n";
echo "</div>\n";
echo "<div class=\"panel panel-primary\">\n";
echo "	<div class=\"panel-heading\">\n";
echo "		<h3 class=\"panel-title\">Participants</h3>\n";
echo "	</div>\n";
echo "	<div class=\"panel-body\">\n";
if ($result !== FALSE) {
	if ($result->rowCount() > 0) {
		echo "		<table class=\"table-hover table-responsive\">\n";
		echo "			<tr>\n";
		echo "				<th style=\"width:50px\">No</th>\n";
		echo "				<th>Nom</th>\n";
		echo "				<th>Prenom</th>\n";
		echo "				<th class=courriel>Courriel</th>\n";
		echo "				<th>Téléphone</th>\n";
		echo "			</tr>\n";
		$i=0;
		while( $row = $result->fetch() )
		{
			echo "<tr>";
			echo "<td style=\"width:50px\">".++$i."</td>";
			echo "<td>".htmlspecialchars($row['nom'])."</td>";
			echo "<td>".htmlspecialchars($row['prenom'])."</td>";
			echo "<td class=courriel><a href=mailto:".htmlspecialchars($row['courriel']).">".htmlspecialchars($row['courriel'])."</a></td>";
			echo "<td>".htmlspecialchars($row['telephone'])."</td>";
			echo "</tr>";
		}
		echo "		</table>\n";
	}
	else {
		echo "Aucun résultat disponible";
	}
}
else {
	echo "Erreur de script";
}
echo "	</div>\n";
echo "</div>\n";
echo "\n";
$phDB->disconnect();
?>
