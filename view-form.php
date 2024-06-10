<?php require_once 'include/header.php'; ?>
    <section id="page-content" class="sidebar-both" style="transform: none;">
            <div class="container" style="transform: none;">
                <div class="heading-text heading-gradient">
                    <h2><span>formulaires de contact</span></h2>
                    <a href="#" class="btn btn-outline btn-roundeded">En attente</a>
                    <a href="#" class="btn btn-outline btn-roundeded">Rappel client</a>
                    <a href="#" class="btn btn-outline btn-roundeded">Traité</a>
                </div>
                <div class="row" style="transform: none;">
                    <!-- post content -->
                    <div class="content col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered table-hover dataTable" style="width:100%" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr>
                                            <th>Date de la demande</th>
                                            <th>Sujet</th>
                                            <th>Nom</th>
                                            <th>Téléphone</th>
                                            <th>E-mail</th>
                                            <th>Statut</th>
                                            <th>Modifs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $reqcount = $pdo->query("SELECT COUNT(*) FROM forms")->fetchColumn(); 

                                            $reqlist = $pdo->query("SELECT * FROM forms");
                                            while ($list = $reqlist->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $list["submitted_at"]?></td>
                                            <td><?= $list["subject"]?></td>
                                            <td><?= $list["name"]?> <?= $list["firstname"]?></td>
                                            <td><?= $list["telephone"]?></td>
                                            <td><?= $list["email"]?></td>
                                            <td><?= $list["status"]?></td>
                                            <td>
                                                <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="icon-edit"></i></a>
                                                <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="icon-trash-2"></i></a>
                                                <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Settings"><i class="icon-settings"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing <?= $reqcount ?> entries</div></div></div>
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
                        <h4 id="modal-label-3" class="modal-title">Large Modal</h4>
                        <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="functions/create-article.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titre">Titre de l'article</label>
                                    <input type="text" aria-required="true" name="titre" required class="form-control required name" placeholder="Entrez le titre de votre article">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Photo de couverture de l'article</label>
                                    <input type="file" name="image" class="form-control-file" id="image" required>
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="content" name="contenu" type="text" name="message" class="form-control"></textarea>
                            </div>

                            <input type="hidden" name="create" value="true"/>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
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
                        <button class="btn btn-b" type="button">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
<?php require_once 'include/footer.php'; ?>
