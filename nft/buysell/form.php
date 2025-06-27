>

    <!-- Content Header (Page header) -->
    <div class="register-box m-auto">
            
      <div class="card">
        <div class="card-body register-card-body" style="border-radius: 50%;">
         
          <div class="register-logo">
            <a href="/"><b>Osogbo Central</b>Hospital</a>
          </div>
        
    
          <form action="form/" method="POST">
            {% csrf_token %}
            {{ form.as_p }}
              <div class="col-12">           
                <button type="submit" class="btn btn-primary btn-block" name="create">Register</button>
              </div>
              <!-- /.col -->
             
            </div>
          </form>           
  
           <a href="nurse" class="text-center">Cancel</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
      
            

        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <div class="col-md-8">
    

          {% endblock %}
              
    
