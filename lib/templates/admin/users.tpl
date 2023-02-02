<div class="rightColumn only">
		<h1>Пользователи</h1>
		<table class="adminOrdersTable">
				<tr class="tableHead">
					<td>Логин</td>
					<td>ФИО</td>
					<td>Телефон</td>
					<td>Адрес</td>
					<td>Email</td>
					<td>Всего&nbsp;заказов</td>
					<td>Общая&nbsp;сумма</td>
					<td></td>
				</tr>
				{if ($ITEMS|@count==0)}
					<tr>
						<td colspan="7">Нет данных</td>
					</tr>
				{else}
				{foreach item=item from=$ITEMS}
				<tr {if $item.notes}class='no_border'{/if}>
					<td><a href="/admin/user.php?id={$item.id}">{$item.login}</a></td>
					<td><a href="/admin/user.php?id={$item.id}">{$item.firstname} {$item.lastname}</a></td>
					<td><a href="/admin/user.php?id={$item.id}">{$item.phone}</a></td>
					<td><a href="/admin/user.php?id={$item.id}">{$item.address}{if $item.address2}, {$item.address2}{/if}</a></td>
					<td><a href="/admin/user.php?id={$item.id}">{$item.email}</a></td>
					<td>{$item.count}</td>
					<td>{$item.sum}</td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteUser({$item.id})"/></td>
				</tr>
				{/foreach}
				{/if}
			</table>
	</div>
</div>
