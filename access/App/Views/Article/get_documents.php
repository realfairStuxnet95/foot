<?php 
if(isset($_POST['article'])){
	require $_SERVER['DOCUMENT_ROOT'].'/magazine_web/classes_loader.php';
	$article_id=$function->sanitize($_POST['article']);
	//check article
	$check=$article->check_article_id($article_id);
	if($check){
		display($article,$article_id);
	}else{
		echo "Please Specify Article";
	}
	//get_documents($article_id)
}else{
	echo "Specify Article";
}


function display($article,$article_id){
	$documents=$article->get_documents($article_id);
	if(count($documents)>0){
		?>
		<table class="table m-0">
			<thead>
				<tr>
					<th>#</th>
					<th>Document</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($documents as $key => $value) {
					?>
					<tr>
						<th scope="row">
							<?php echo $value['attach_id']; ?>
						</th>
						<td>
							<img src="assets/IMG/<?php echo $value['file_name']; ?>" style="width:100px;height: auto;">
						</td>
						<td>
							<?php 
							if($value['status']=='PENDING'){
								?>
								<span class="badge badge-danger">
									<?php echo $value['status']; ?>
								</span>
								<?php
							}
							?>
						</td>
						<td>
							<a action="<?php echo $value['attach_id']; ?>" class="btn btn-danger btn-sm btn_remove">
								<i class="fa fa-close"></i>
							</a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<?php
	}
}
?>
<?php 
// include_once $_SERVER['DOCUMENT_ROOT'].'/magazine_web/App/Views/Home/scripts.php';
?>
<script type="text/javascript">
	$(function(){
		var input=[];
	 $("a.btn_remove").click(function(){
		var action=$(this).attr("action");
		input[0]="delete_document";
		input[1]=action;
		if(confirm("You Are about to Delete Attachment.")){
			saveData(input,"add_article?action=edit&article="+current_article);
		}
	 });

	function saveData(input,redirectUrl){
		var url="save_data";
		$.post(url,{
			input:input
		},function(response){
			if(response.match("200")){
				//alert(response);
				window.location=redirectUrl;
			}else{
				alert(response);
			}
		});
	}
	});

</script>
