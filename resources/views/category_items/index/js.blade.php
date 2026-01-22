<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        getData();

        $('.btn-get-data').click(function() {
            getData();
        });
    });

    function getData() {
        $('#loading-filter').show();

        var nama = $('#filter-nama').val();
        var kode = $('#filter-kode').val();

        $.ajax({
            url: '{{ url('category-items/search') }}',
            method: 'GET',
            data: {
                nama: nama,
                kode: kode
            },
            success: function(response) {
                var data = JSON.parse(response);
                var tbody = '';

                if (data.data.length > 0) {
                    $.each(data.data, function(index, item) {
                        tbody += '<tr>';
                        tbody += '<td>' + (index + 1) + '</td>';
                        tbody += '<td>' + item.kode + '</td>';
                        tbody += '<td>' + item.name + '</td>';
                        tbody += '<td>' + item.master_items_count +
                            '</td>';
                        tbody += '<td>' + formatDate(item.created_at) + '</td>';
                        tbody += '<td>';
                        tbody += '<a href="{{ url('category-items/view') }}/' + item.id +
                            '" class="btn btn-sm btn-info">Detail</a> ';
                        tbody += '<a href="{{ url('category-items/form/edit') }}/' + item.id +
                            '" class="btn btn-sm btn-warning">Edit</a> ';
                        tbody += '<a href="{{ url('category-items/delete') }}/' + item.id +
                            '" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin hapus?\')">Hapus</a>';
                        tbody += '</td>';
                        tbody += '</tr>';
                    });
                } else {
                    tbody = '<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>';
                }

                $('#table-data tbody').html(tbody);
                $('#loading-filter').hide();
            }
        });
    }

    function formatDate(dateString) {
        var date = new Date(dateString);
        return date.toLocaleDateString('id-ID');
    }
</script>
