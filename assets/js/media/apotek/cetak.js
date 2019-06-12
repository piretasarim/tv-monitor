function IsiSemua(no_resep)
{
	// alert(no_resep);
		swal({
		title: "Input Jumlah!",
		text: "Jumlah Etiket Obat Tercetak (Perobat):",
		type: "input",
		inputType: 'number',
		showCancelButton: true,
		closeOnConfirm: false,
		allowEscapeKey: false,
		animation: "slide-from-top",
		inputPlaceholder: "Input Angka Positif!"
	},

	function (inputValue) {

		if (inputValue === false) return false;

		if (inputValue === "") {
			swal.showInputError("Jangan Kosong atau Input Berupa Angka Positif");
			return false
		}

		// if (inputValue >= 48 && inputValue <= 57) {
		if(inputValue === ForceNumericOnly) {
			swal.showInputError("Input Angka Positif!");
			return false
		}

        if (!inputValue) return;

        $.ajax({
            url: BASEURL+"/"+"apotek"+"/"+"cetak_resep"+"/"+"cetak_etiket"+"/"+inputValue+"/"+no_resep,
            type: "POST",
            dataType: "json",
            data: $('.form2').serializeArray(),
            success: function () {

           	if(data.status) //if success close modal and reload ajax table
            {
            	swal({   
            		title: "Sukses Diproses!",   
            		text: "Akan keluar otomatis..",   
            		timer: 1000,     
            		showConfirmButton: false 
            	});
                // swal("Selesai!", "Berkas telah diterima", "success");
            }else{

            	swal({   
            		title: "Gagal Diproses!",   
            		text: "Akan keluar otomatis..",   
            		timer: 2000,   
            		showConfirmButton: false 
            	});
            }

            },
            error: function (xhr, ajaxOptions, thrownError) {
            	swal({   
            		title: "Gagal Diproses!",   
            		text: "Akan keluar otomatis..",   
            		timer: 8000,   
            		showConfirmButton: false 
            	});
                // swal("Batal!", "Berkas belum diterima", "error");
            }
        });
        swal("Hak Akses!", "You wrote: " + inputValue, "success");
    });

	// function(inputValue){
	// 	if (inputValue === false) return false;

	// 	if (inputValue === "") {
	// 		swal.showInputError("You need to write something!");
	// 		return false
	// 	}

	// 	swal("Nice!", "You wrote: " + inputValue, "success");
	// });
}

// Numeric only control handler
// source: http://stackoverflow.com/a/2403024
var ForceNumericOnly = function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                key < 0 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};