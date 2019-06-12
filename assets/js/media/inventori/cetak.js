function mutasiPDF(material_group, kode_mutasi, id_depo, page)
{
	// swal(no_resep);

    var kode_mutasi = !($("#no_so").val()) ? "0" : $("#no_so").val();
    var id_depo = !($("#id_depo").val()) ? "0" : $("#id_depo").val();
    var material = !($("#material_group").val()) ? "0" : $("#material_group").val();

	swal({
		title: "Input Jumlah!",
		text: "Input Nomor Panjang awal dan akhir..",
		type: "input",
		// inputType: 'number',
		showCancelButton: true,
		closeOnConfirm: false,
		allowEscapeKey: false,
		animation: "slide-from-top",
		inputPlaceholder: "Input Angka Positif!",
	},

	function (page) {

		if (page === false) return false;

		if (page === "") {
			swal.showInputError("Jangan Kosong atau Input Berupa Angka Positif dan Angka Awal");
			return false
		}

		// if (inputValue >= 48 && inputValue <= 57) {
		// if(awal === ForceNumericOnly) {
		// 	swal.showInputError("Input Angka Positif!");
		// 	return false
		// }

        if (!page) return;

        $.ajax({
            url: BASEURL+"/"+"inventori"+"/"+"cetak_so"+"/"+"pdf_mutasi"+"/"+material+"/"+kode_mutasi+"/"+id_depo+"/"+page,
            type: "POST",
            // dataType: "json"
        }).done(function(msg) {
            var url = BASEURL+"/"+"inventori"+"/"+"cetak_so"+"/"+"pdf_mutasi"+"/"+material+"/"+kode_mutasi+"/"+id_depo+"/"+page;
            var windowName = "popUp";
            var windowSize = "width=250,height=100";
            window.open(url, windowName, windowSize);
        });
        swal("Tunggu sebentar!", "You wrote: " + kode_mutasi, "success");
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