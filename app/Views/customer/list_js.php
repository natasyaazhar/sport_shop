<script>
    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        var id = $(this).parent().siblings()[0].value;
        $.ajax({
            url:"<?= base_url(); ?>" + "/customer/id/" + id,
            method: "GET",
            success: function(result){
                var res = JSON.parse(result);
                $(".update_id").val(res.id);
                $(".update_name").val(res.name);
                $(".update_email").val(res.email);
                $(".update_skillset").val(res.skillset);
                $(".update_hobby").val(res.hobby);
                $(".update_no_phone").val(res.no_phone);
            }
        });
    });
    
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var id = $(this).parent().siblings()[0].value;
        $.ajax({
            url:"<?= base_url(); ?>" + "/customer/id/" + id,
            method: "GET",
            success: function(result){
                var res = JSON.parse(result);
                $(".delete_id").val(res.id);
            }
        });
    });
    
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });
    
    $(document).on('click', '.delete_all_customer', function(e){
        e.preventDefault();
        var checkboxes = $('.data_checkbox:checked');
        if(checkboxes.length > 0)
        {
            var ids = [];
            checkboxes.each(function()
            {
                ids.push($(this).val());
            });

            // $(".delete_all_ids").val(ids);

            $.ajax({
                url:"<?= base_url('delete_all'); ?>",
                method: "POST",
                data: {
                    ids: ids
                }
            });
        } else {
            console.log("else");
        }
    });
</script>