@extends('layouts.painel-main')

@section('crop-head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
  <style>
    .modal-dialog {
      max-width: 100%;
      margin: 1rem;
    }

    .img-container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 500px;
      background-color: #f7f7f7;
      overflow: hidden;
    }
  </style>
@endsection

@section('user', 'Admin')


@section('op') {{-- OPÇÕES DO MENU LATERAL (INCÍCIO) --}}
  {{-- MENU TORNEIOS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-torneios" aria-expanded="true" aria-controls="menu-torneios">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
        </svg>

        Torneios
    </div>

    <div class="collapse show" id="menu-torneios">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/dashboard" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
        <a href="/painel/registro_torneio" class="submenu-link link-light text-decoration-none rounded p-2 active">
          <small class="d-flex justify-content-between align-items-center">
            Cadastrar
            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </small>
        </a>
        <a href="/painel/destaques" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Destaques
          </small>
        </a>
      </div>
    </div>
  </div>
  {{-- MENU ATLETAS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-atletas" aria-expanded="true" aria-controls="menu-atletas">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
        </svg>

        Atletas
    </div>

    <div class="collapse" id="menu-atletas">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/atletas" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
      </div>
    </div>
  </div>
  {{-- MENU USUÁRIOS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>

        Usuários
    </div>

    <div class="collapse" id="menu-usuario">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/users" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
        <a href="/painel/cadastro" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Cadastrar
          </small>
        </a>
      </div>
    </div>
  </div>
@endsection {{-- OPÇÕES DO MENU LATERAL (FIM) --}}


@section('main')

  {{-- cabeçalho --}}
  <div class="d-flex justify-content-between mb-4">
    <h1 class="h3">Registrar Torneio</h1>
  </div>

  @if(session('msg'))
    <div class="msgErro">
      <p>{{ session('msg') }}</p>
    </div>
  @endif

  @if($errors->any())
    <ul class="d-flex flex-column">
      @foreach($errors->all() as $error)
        <li style="color: orange">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  {{-- forms --}}
  <form action="/painel/registro_torneio" method="POST" enctype="multipart/form-data" class="bg-custom rounded col-12 py-3 px-4">

    @csrf
    <div class="mb-3 row">
      <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo" placeholder="Nome do torneio">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="imagem" class="col-sm-2 col-form-label">Imagem do torneio:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="imagem" name="imagem" style="color: rgb(240, 206, 145)" accept="image/*">
      </div>
    </div>
    
    <div class="mb-3 row">
      <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="cidade" name="cidade" placeholder="Cidade do torneio">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
      <div class="col-sm-3">
        <select name="estado" class="form-control bg-dark text-light border-dark form-select" id="estado">
          <option value="" disabled selected>Selecione o Estado...</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="data" class="col-sm-2 col-form-label">Data de realização:</label>
      <div class="col-sm-3">
        <input type="date" class="form-control bg-dark text-light border-dark" id="data" name="data" placeholder="">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="sobre" class="col-sm-2 col-form-label">Sobre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="sobre" name="sobre" placeholder="">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="ginasio" class="col-sm-2 col-form-label">Ginásio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="ginasio" name="ginasio">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="infos_gerais" class="col-sm-2 col-form-label">Informações Gerais:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="infos_gerais" name="infos_gerais">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="entrada_publico" class="col-sm-2 col-form-label">Entrada ao Público:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="entrada_publico" name="entrada_publico">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
      <div class="col-sm-3">
        <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
          <option value="" disabled selected>Selecione</option>
          <option value="Kimono">Kimono</option>
          <option value="No-GI">No-GI</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="fase" class="col-sm-2 col-form-label">Fase:</label>
      <div class="col-sm-3">
        <select name="fase" class="form-control bg-dark text-light border-dark form-select" id="fase">
          <option value="" disabled selected>Selecione</option>
          <option value="Inscrições Abertas">Inscrições Abertas</option>
          <option value="Chaveamento">Chaveamento</option>
          <option value="Resultados">Resultados</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="status" class="col-sm-2 col-form-label">Status:</label>
      <div class="col-sm-3">
        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
          <option value="" disabled selected>Selecione</option>
          <option value="1">Ativo</option>
          <option value="0">Inativo</option>
        </select>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-light">Cadastrar</button>
    </div>
  </form>

@endsection


@section('crop-modal')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

  <script>
    $(document).ready(function() {
        let cropper;
        let croppedImageDataURL;

        // Initialize the Cropper.js instance when the modal is shown
        $('#cropImageModal').on('shown.bs.modal', function() {
            cropper = new Cropper($('#imageToCrop')[0], {
                aspectRatio: 1 / 1,
                viewMode: 1,
                autoCropArea: 0.8,
            });
        });

        // Destroy the Cropper.js instance when the modal is hidden
        $('#cropImageModal').on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        // Show the image cropping modal when an image is selected
        $('#image').on('change', function(event) {
            const file = event.target.files[0];
            const fileReader = new FileReader();

            fileReader.onload = function(e) {
                $('#imageToCrop').attr('src', e.target.result);
                $('#cropImageModal').modal('show');
            };

            fileReader.readAsDataURL(file);
        });

        // Handle the "Crop and Upload" button click
        $('#cropAndUpload').on('click', function() {
            croppedImageDataURL = cropper.getCroppedCanvas().toDataURL();
            uploadCroppedImage();
            $('#cropImageModal').modal('hide');
        });

        // Upload the cropped image to the server
        function uploadCroppedImage() {
            const formData = new FormData();
            formData.append('_token', $('input[name=_token]').val());
            formData.append('image', dataURLtoFile(croppedImageDataURL, 'cropped-image.png'));

            $.ajax({
                url: '/painel/registro_torneio',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle the server response, e.g., display the cropped image
                },
                error: function(xhr, status, error) {
                    // Handle errors
                },
            });
        }

        // Helper function to convert a data URL to a File object
        function dataURLtoFile(dataURL, filename) {
            const arr = dataURL.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);

            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }

            return new File([u8arr], filename, { type: mime });
        }
    });
  </script>

  <div class="modal fade" id="cropImageModal" tabindex="-1" aria-labelledby="cropImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cropImageModalLabel">Crop Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <img id="imageToCrop" src="#" alt="Image to crop">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="cropAndUpload">Crop and Upload</button>
        </div>
      </div>
    </div>
  </div>
@endsection