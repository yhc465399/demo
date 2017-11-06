<style>
	#head_edit thead th{
		background-color:#08d4f7;
	}
</style>
<div class="sec-title col-md-12">
	<div class="col-md-9  col-md-offset-3" >
		<div>
			<a href="<?=base_url('member/new_member');?>">新增人員</a>
			<a href="<?=base_url('member/new_member2');?>">新增房東</a>
		</div>
	</div>
</div>
<div class="col-md-12">
<BR>
<div class="col-md-9  col-md-offset-3" >
<table class="view_tab">
<?php if($this->session->userdata('airclean')["user_identity"] == "A1"){?>
<p>人員查詢<br>
<form action="<?=base_url('/member/')?>"  method="GET" accept-charset="utf-8"  >

	<select name="search_group" id="search_group">
		<option value="all" selected>全部</option>
	<option value="A1">管理</option>
	<option value="A2">担當</option>
	<option value="B1">房東</option>
	<option value="C1">清掃人員</option>
	</select>
	<input type="submit"  value="查詢">
	</form>
</p>

<?php }?>
		<table id="head_edit"
				data-toggle="table"
				data-toolbar="#toolbar"
				data-search="true"
				data-show-pagination-switch="true"
				data-url="<?=base_url("member/get_user_list").$url_search_str?>"
				data-page-list="[10, 20, ALL]"
				
				
			>
			<thead>
				<tr>
					  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
					  <th data-field='user_name'  data-formatter="nameFormatter" data-width='60%'    data-sortable="true" data-filter-control="true" data-editable="true"  >姓名</th>
					  <th data-field='account'    data-formatter="accountFormatter" data-width='15%' data-sortable="true" data-filter-control="true" data-editable="true" >帳號</th>
				<th data-field='group_name' data-width='25%' data-sortable="true" data-filter-control="true" data-editable="true" >身分別</th>
				</tr>
			</thead>
		</table>
	
	</div>
	</div>
<p>&nbsp;</p>

<script>
function accountFormatter(value, row, index){
		return [
			'<a href="<?=base_url("member/view_member/")?>/'+row.NO+'" class="musPick">'+value+'</div>'
		].join('');
}

function nameFormatter(value, row, index){
	var name_str = "";
	if(row.user_identity == "B1")
	{
		name_str = row.owner_company != "" ? row.owner_company : row.owner_delegate;
	}else
	{
		name_str = value;
	}
		return [
			'<a href="<?=base_url("member/view_member/")?>/'+row.NO+'" class="musPick">'+name_str+'</div>'
		].join('');
}
</script>
 