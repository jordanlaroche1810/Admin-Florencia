<?php require_once 'include/header.php'; ?>
    <section id="page-content" class="sidebar-both" style="transform: none;">
            <div class="container" style="transform: none;">
                <div class="heading-text heading-gradient">
                    <h2><span>galerie portfolio</span></h2>
                </div>
                <div class="row" style="transform: none;">
                    <!-- Sidebar-->
                    <div class="sidebar sticky-sidebar col-lg-3" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 831.367px;">
                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: fixed; transform: translateY(120px); width: 245px; left: 61px; top: 0px;"><div class="widget ">
                                <h4 class="widget-title">Actions</h4>
                                <div class="post-thumbnail-list">
                                    <div class="post-thumbnail-entry">
                                        <div class="post-thumbnail-content">
                                            <button class="btn btn-primary btn-icon-holder" data-bs-target="#modal-3" data-bs-toggle="modal" href="#">Ajouter une photo<i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Sidebar-->
                    <!-- post content -->
                    <div class="content col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-select form-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered table-hover dataTable" style="width:100%" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr>
                                            <th>Date de création</th>
                                            <th>Catégorie</th>
                                            <th>Titre</th>
                                            <th>Modifs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $reqcount = $pdo->query("SELECT COUNT(*) FROM portfolio")->fetchColumn(); 

                                            $reqlist = $pdo->query("SELECT * FROM portfolio");
                                            while ($list = $reqlist->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $list["uploaded_at"]?></td>
                                            <td><?= $list["category"]?></td>
                                            <td><?= $list["alt"]?></td>
                                            <td>
                                                <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="icon-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of <?= $reqcount ?> entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                            </div>
                        </div>
                            
                        <!-- end: Blog -->
                    </div>
                    <!-- end: post content -->
                </div>
            </div>
        </section>

        <div class="modal fade show" id="modal-3" tabindex="-1" aria-labelledby="modal-label-3" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modal-label-3" class="modal-title">Ajout d'image pour le portfolio</h4>
                        <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="functions/upload-image.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="categorie">Catégorie de l'article</label>
                                    <select class="form-select" name="categorie" id="category-ie">
                                        <option>Question</option>
                                        <option>Devis</option>
                                        <option>Partenariat</option>
                                        <option>Autres</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">Photo de couverture de l'article</label>
                                    <input type="file" name="image" class="form-control-file" id="image" required>
                                </div>
                            </div>

                            <input type="hidden" name="picture" value="true"/>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Ajouter la photo</button>
                        </form>
                        <script src="https://cdn.tiny.cloud/1/gqmgjt6nrnr2z6at7rlx6pa566cv3w6h4dg09y2ycwh6mwxh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({
                                selector: '#content',
                                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                toolbar_mode: 'floating',
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal" class="btn btn-b" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php require_once 'include/footer.php'; ?>
