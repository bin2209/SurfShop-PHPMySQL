<style>
#treatment-plan td:last-child,
#treatment-plan th:last-child,
#treatment-plan #add-row-TreatmentPlan {
    display: block;
}

.modal-content {
    background-color: #191c24;
}

.modal-body input {
    width: 100%;
    margin: 5px 0;
}
</style>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="float:left;width:fit-content;">Pages</h4>
                <button style="float:right;" id="edit-TreatmentPlan"
                    class="add btn btn-primary todo-list-add-btn">Edit</button>
                <div id="treatment-plan" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Title </th>
                                <th> Keywords </th>
                                <th> Description </th>
                                <th> Connect to URL (Slug) </th>
                                <th> Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $stmt = $conn->prepare("SELECT * FROM meta_tags");
                        $stmt->execute();
                        while ($row = $stmt->fetch()){
                            $meta_id = $row["id"];
                            $meta_title = $row["meta_title"];
                            $meta_keywords = $row["meta_keywords"];
                            $meta_description = $row["meta_description"];
                            $meta_url = $row["meta_url"];
                            ?>
                            <tr id="treatment-plan-row<?=$meta_id?>">
                                <td><?=$meta_id?></td>
                                <td><?=$meta_title?></td>
                                <td class="keywords"><?=$meta_keywords?></td>
                                <td class="description"><?=$meta_description?></td>
                                <td><a href="../<?=$meta_url?>" target="_blank"><?=$meta_url?></a></td>
                                <td>
                                    <div style="cursor: pointer;" class="badge badge-outline-success"
                                        href="#treatmentPlanRowDialog" data-toggle="modal">Edit</div>
                                </td>
                                </td>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="treatmentPlanRowDialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <small>Keywords:</small>
                <input type="text" name="keywords" value="" placeholder="Keywords" />
                <small>Description:</small>
                <input type="text" name="description" value="" placeholder="Description" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-TreatmentPlanRowDialog">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#edit-TreatmentPlan').click(function() {
        $('td:last-child(), th:last-child(), #add-row-TreatmentPlan').toggle();
    });


    //triggered when modal is about to be shown
    $('#treatmentPlanRowDialog').on('show.bs.modal', function(e) {
        // get row
        row = $(e.relatedTarget).closest('tr');

        // get values from row
        var rowkeywords = row.find('.keywords').text();
        var rowdescription = row.find('.description').text();

        //populate modal
        $(e.currentTarget).find('input[name="keywords"]').val(rowkeywords);
        $(e.currentTarget).find('input[name="description"]').val(rowdescription);
    });

    $('#save-TreatmentPlanRowDialog').click(function() {
        // TODO: save data to backend
        // get row-id attribute of the clicked element's row
        var rowId = row.attr('id');
        var justId = rowId.replace("treatment-plan-row",'');
        // update row values
        var modalContent = $(this).closest('.modal-content');
        var keywords = modalContent.find('input[name="keywords"]').val();
        var description = modalContent.find('input[name="description"]').val();

        row.find('.keywords').text(keywords);
        row.find('.description').text(description);

        $.ajax({
            type: "POST",
            url: "./request/pages.php",
            data: {
                type: "edit_page",
                id: justId,
                meta_keywords: keywords,
                meta_description: description,

            },
            success: function(res) {
              $('#treatmentPlanRowDialog').modal('hide');
                // location.reload();
            }
        });
        // we're done, close modal
    });
});
</script>
