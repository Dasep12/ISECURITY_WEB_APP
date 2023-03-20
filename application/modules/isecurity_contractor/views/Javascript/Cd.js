$(document).ready(function(){
    $("#CdOutsourching").on('submit',function(es){
		es.preventDefault();
		var perusahaan = document.getElementById('perusahaan').value;
		var status = document.getElementById('status').value;
		$.ajax({
		  url : "Outsourching/Inputcompany",
		  data : new FormData(this),
		  method : "POST",
		  processData : false,
		  contentType : false,
		  cache : false,
		  success : function(response){
			alert(response);
			// if(response = "Sukses"){
			// 	Swal.fire({
			// 		toast : true,
			// 		icon  : 'success',
			// 		title : 'Perusahaan Berhasil di Tambahkan',
			// 		animation : false,
			// 		position : 'top-right',
			// 		showConfirmButton : false,
			// 		timer : 3000,
			// 		timerProgressBar : true,
			// 		didOpen: (toast) => {
			// 			toast.addEventListener('mouseenter', Swal.stopTimer)
			// 			toast.addEventListener('mouseleave', Swal.resumeTimer)
			// 		  }
			// 	})
			// 	.then(setTimeout(() => {
			// 		document.location.reload();
			//    }, 3000));
			// }else{
			// 	Swal.fire({
			// 		toast : true,
			// 		icon  : 'error',
			// 		title : 'Perusahaan Gagal di Tambahkan',
			// 		animation : false,
			// 		position : 'top-right',
			// 		showConfirmButton : false,
			// 		timer : 3000,
			// 		timerProgressBar : true,
			// 		didOpen: (toast) => {
			// 			toast.addEventListener('mouseenter', Swal.stopTimer)
			// 			toast.addEventListener('mouseleave', Swal.resumeTimer)
			// 		  }
			// 	})
			// 	.then(setTimeout(() => {
			// 		document.location.reload();
			//    }, 3000));
			// }
		  }
		})
	  });

	  $("#UpdateMasterAKunUser").on('submit',function(event){
		event.preventDefault();
		var npk = document.getElementById('id_karyawan').value;
		var SecOps = document.getElementById('SecOps').value;
		var SecAdm = document.getElementById('SecAdm').value;
		var LaySec = document.getElementById('LaySec').value;
		var SecInfo = document.getElementById('SecInfo').value;
		var Training = document.getElementById('Training').value;
		var Asms = document.getElementById('ASMS').value;
		var Atsg = document.getElementById('ATSG').value;
		var Smp = document.getElementById('SMP').value;
		var Cd = document.getElementById('ControlDatabase').value;
		var Review = document.getElementById('Review').value;
		var Syncronize = document.getElementById('Syncronize').value;
		var Log = document.getElementById('Log').value;
		const queryString = window.location.search;
		console.log(queryString);

		$.ajax({
			url : "../Updateakun",
			data : new FormData(this),
			method : "POST",
			processData : false,
			contentType : false,
			cache : false,
			success : function(response){
				// console.log(response);
				if(response = "Sukses"){
					Swal.fire({
						toast : true,
						icon  : 'success',
						title : 'Berhasil',
						animation : false,
						position : 'top-right',
						showConfirmButton : false,
						timer : 3000,
						timerProgressBar : true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						  }
					}).then(setTimeout(() => {
						document.location.reload();
				   }, 3000));
				}else{
					Swal.fire({
						toast : true,
						icon  : 'error',
						title : 'Gagal',
						animation : false,
						position : 'top-right',
						showConfirmButton : false,
						timer : 3000,
						timerProgressBar : true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						  }
					}).then(setTimeout(() => {
						document.location.reload();
				   }, 3000));
				}
			}
		})
	});

	$("#GetAreaKerja").select2({
		ajax: { 
		  url: "getAreakerja",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params,page) {
			const wilayah = $("#Userwilayah").val();
			 return {
			   searchTerm: params.term, // search term
			   id_wilayah : wilayah,
			   page_limit : 10,
			};
			
		  },
		  processResults: function (response) {
			var results = [];
			$.each(response, function(index,item){
				results.push({
					id : item.id,
					text :  item.text,
				})
			})
			return {
				results: results
			};
		  },
		  cache: true
		}
	});
});