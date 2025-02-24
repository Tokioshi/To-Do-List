document.querySelectorAll(".delete-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`deleteForm${id}`).submit();
            }
        });
    });
});