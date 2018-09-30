function change_data(){
	let old_login = $("#u_login").val();
	let old_name  = $("#u_name").val();
	let old_surname = $("#u_surname").val();
	let old_role = $("#u_role").val();
	console.log(old_name+" "+old_surname+" "+old_login+" "+old_role);
	$.post("update_info.php",
		{
			name : old_name,
			sname : old_surname,
			role : old_role,
			u_name : old_login
		},
		function(data){
			// alert(data);
		});
}

function change_password() {
	let oldpas = $("#u_oldpsw").val();
	let newpas = $("#u_newpsw").val();
	let newpas2 = $("#u_sbmtpsw").val();
	let name = $("#psw_u_name").val();
	console.log(oldpas+" "+newpas+" "+newpas2+" "+name);
	$.post("update_psw.php",
		{
			old_psw : oldpas,
			new_psw : newpas,
			new_psw2 : newpas2,
			u_name : name
		},
		function(data){
			alert(data);
		});
}

function change_image(){
	let oldpas = $("#u_oldpsw").val();
	let newpas = $("#u_newpsw").val();
	let newpas2 = $("#u_sbmtpsw").val();
	let name = $("#psw_u_name").val();
	console.log(oldpas+" "+newpas+" "+newpas2+" "+name);
	$.post("update_psw.php",
		{
			old_psw : oldpas,
			new_psw : newpas,
			new_psw2 : newpas2,
			u_name : name
		},
		function(data){
			alert(data);
		});
function go_home() {
	window.location.replace("index.php");
}
}

