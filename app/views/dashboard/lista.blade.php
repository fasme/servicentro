@extends('layouts.master')

@section('breadcrumb')
<ul class="breadcrumb">
            <li>
              <i class="fa fa-home home-fa fa"></i>
              <a href="#">Home</a>

              <span class="divider">
                <i class="fa fa-angle-right arrow-fa fa"></i>
              </span>
            </li>

            <li>
              <a href={{ URL::to('orden') }}>orden</a>

              <span class="divider">
                <i class="fa fa-angle-right arrow-fa fa"></i>
              </span>
            </li>
            <li>Ver orden</li>
          </ul><!--.breadcrumb-->

          @stop

@section('contenido')


<div class="page-header position-relative">
<h1>
							Dashboard
							<small>
								<i class="fa fa-angle-double-right"></i>

								
							</small>
						</h1>
					</div>




<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="fa fa-remove"></i>
								</button>

								<i class="fa fa-ok green"></i>

								Bienvenido
								<strong class="green">
									{{ Auth::user()->nombre }}
									{{ Auth::user()->apellido }}
									<small>Constructora CGS (v 0.0.1)</small>
								</strong>
Panel de control
							</div>











@stop
