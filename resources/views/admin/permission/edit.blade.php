  @extends('admin.layout.master')
  @section('content')

 <div class="row">
  <div class="col-md-12">
     

 <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> {{ $page_name }} </strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach

                      </ul>
   
                  </div>
                    @endif

                                  
                                  <hr>

    {{ Form::model($permission,['route' => ['permission-update',$permission->id],'method'=>'put']) }}
                                 
                                      
                          <div class="form-group">
            {{ Form::label('name', 'Name', array('class' => 'control-label mb-1')) }}
                                      
            {{ Form::text('name',null,['class'=>'form-control','id'=>'name'] )  }}
                                </div>

                                 <div class="form-group">
            {{ Form::label('display_name', 'Display Name', array('class' => 'control-label mb-1')) }}
                                      
             {{ Form::text('display_name',null,['class'=>'form-control','id'=>'display_name'] )  }}
                                </div>

                                 <div class="form-group">
            {{ Form::label('description', 'Description', array('class' => 'control-label mb-1')) }}
                                      
            {{ Form::textarea('description',null,['class'=>'form-control','id'=>'description'] )  }}
                                </div>
 
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Update</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
                                  {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->


    </div>
   
 </div>

   @endsection                 