$(document).ready(function(){
    $("#SecOpsPenVisitor").on('submit',function(se){
		se.preventDefault();
		var namaTamu = document.getElementById('namaTa').value;
		var depart   = document.getElementById('department').value;
		var divisi	 = document.getElementById('divisi').value;
		var bertemu  = document.getElementById('Bertemu').value;
		$.ajax({
		  url : "InputVisitor",
		  data : new FormData(this),
		  method : "POST",
		  processData : false,
		  contentType : false,
		  cache : false,
		  success : function(response){	
		
			if(response = "Sukses"){
				Swal.fire({
					toast : true,
					icon  : 'success',
					title : 'Visitor Berhasil Di Input',
					animation : false,
					position : 'top-right',
					showConfirmButton : false,
					timer : 3000,
					timerProgressBar : true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					  }
				})
				.then(setTimeout(() => {
					document.location.reload();
			   }, 3000));
			}else{
				Swal.fire({
					toast : true,
					icon  : 'error',
					title : 'Visitor Gagal Di Input',
					animation : false,
					position : 'top-right',
					showConfirmButton : false,
					timer : 3000,
					timerProgressBar : true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					  }
				})
				.then(setTimeout(() => {
					document.location.reload();
			   }, 3000));
			}
		  }
		})
	  });

      $("#namaTa").select2({
		ajax: { 
		  url: "getTamu",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params) {
			 return {
			   searchTerm: params.term // search term
			 };
		  },
		  processResults: function (response) {
			var results = [];
			$.each(response, function(index,item){
				results.push({
					id : item.id,
					text : item.text + " - " + item.perusahaan
				})
			})
			return {
				results: results
			};
		  },
		  cache: true
		}
	});

    $('select[name=namaTa]').on("change",function(){
		var namaTa =  $(this).children("option:selected").val();
		$.ajax({
			url : "getProfileTamu",
			method : "post",
			data : "id_tamu=" + namaTa,
			success : function(e){
				const result = JSON.parse(e);
				document.getElementById("noKtp").value = result[0].noKtpTamu;
				document.getElementById("alamatTempatTinggal").value = result[0].alamat;
				document.getElementById("no_hp").value = result[0].noTelp;
				document.getElementById("nomorPolisiKendaraan").value = result[0].noPolice;
				document.getElementById("wargaNegara").value = result[0].wargaNegara;
				document.getElementById("perusahaanTamu").value = result[0].perusahaan;
				
			}
		})
	});

    $("#department").select2({
		ajax: { 
		  url: "getDepartment",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params) {
			 return {
			   searchTerm: params.term // search term
			 };
		  },
		  processResults: function (response) {
			var results = [];
			$.each(response, function(index,item){
				results.push({
					id : item.id,
					text : item.text 
				})
			})
			return {
				results: results
			};
		  },
		  cache: true
		}
	});

	$("#divisi").select2({
		ajax: { 
		  url: "getdivisi",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params,page) {
			const depart = $("#department").val();
			 return {
			   searchTerm: params.term, // search term
			   id_department : depart,
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
	

	$("#Bertemu").select2({
		ajax: { 
		  url: "GetBertemuDengan",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params,page) {
			const divisi = $("#divisi").val();
			 return {
			   searchTerm: params.term, // search term
			   id_divisi : divisi,
			   page_limit : 10,
			};
			
		  },
		  processResults: function (response) {
			var results = [];
			$.each(response, function(index,item){
				results.push({
					id : item.id,
					text : item.text  + " - " + item.divisi,
				})
			})
			return {
				results: results
			};
		  },
		  cache: true
		}
	});

    $("#Getdepart").select2({
		ajax: { 
		  url: "getDepartment",
		  type: "post",
		  dataType: 'json',
		  delay: 250,
		  data: function (params) {
			 return {
			   searchTerm: params.term // search term
			 };
		  },
		  processResults: function (response) {
			var results = [];
			$.each(response, function(index,item){
				results.push({
					id : item.id,
					text : item.text 
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