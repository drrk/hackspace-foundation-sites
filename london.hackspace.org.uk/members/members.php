<? 
$page = 'members';
require( '../header.php' );

if (!$user) {
	fURL::redirect('/');
}
?>
<h2>Members list</h2>
<?

if($user->isMember()) {

$db = new fDatabase('sqlite', dirname(__FILE__) . '/../../var/database.db');

?>
	<p>This is a list of all members, up to date as of the last accounts reconcilliation.</p>
	<table>
		<thead>
			<tr>
				<th>Full name</th>
			</tr>
		</thead>
		<tbody>
<?php
$users = $db->translatedQuery( 'SELECT full_name FROM users' );
foreach( $users as $row ):
?>
			<tr>
				<td><?php echo $row['full_name'] ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<p><a href="index.php">Return to membership home</a></p>
<? } else { ?>
	<p>You must be a member to use this page.</p>
<?php } 

require('../footer.php'); ?>
