const flashData = $(".flash-data").data("flashdata");

console.log(flashData);

console.log({
	title: "Data Mahasiswa ",
	text: "Berhasil " + flashData,
	type: "success",
});

// Swal.fire("Tes", "Tes " + flashData, "success");

if (flashData) {
	Swal.fire({
		title: "Data Mahasiswa ",
		text: "Berhasil " + flashData,
		type: "success",
		icon: "success",
	});
}

$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	console.log(href);

	Swal.fire({
		title: "Apakah Anda yakin?",
		text: "Data Mahasiswa akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
