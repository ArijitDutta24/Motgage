<!-- Modal -->
                      <div class="modal fade" id="deleteModal{{ $val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are You Sure To Delete?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                                            
                            </div>
                            <div class="modal-footer">
                               <form action="{{ route('admin.gallerydelete', base64_encode($val->id)) }}" method="post">
                                {{ csrf_field() }}
                                  <button type="submit" class="btn btn-primary">Delete</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                              
                            </div>
                          </div>
                        </div>
                      </div>