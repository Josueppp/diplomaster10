@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
<h2 class="profile-title">Perfil de Usuario</h2>

<div>
  <!-- Botones de tabs -->
  <div class="tabs-container">
    <button class="tab-btn active" data-tab="info">Actualizar Información</button>
    <button class="tab-btn" data-tab="password">Actualizar Contraseña</button>
    <button class="tab-btn" data-tab="delete">Eliminar Cuenta</button>
  </div>

  <!-- Contenido de tabs -->
  <div id="info" class="tab-content" style="display:block;">
    @include('profile.partials.update-profile-information-form')
  </div>
  <div id="password" class="tab-content" style="display:none;">
    @include('profile.partials.update-password-form')
  </div>
  <div id="delete" class="tab-content" style="display:none;">
    @include('profile.partials.delete-user-form')
  </div>
</div>

<script>
  // Función para manejar tabs
  document.querySelectorAll('.tab-btn').forEach(button => {
    button.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(tc => tc.style.display = 'none');
      button.classList.add('active');
      const tab = button.getAttribute('data-tab');
      document.getElementById(tab).style.display = 'block';
    });
  });
</script>

<style>
  /* Tipografía y contenedor */
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #1f2937; /* gris oscuro */
    background-color: #f9fafb;
  }

  .profile-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #111827;
    text-align: center;
    letter-spacing: 0.03em;
  }

  .tabs-container {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-bottom: 1.5rem;
  }

  .tab-btn {
    padding: 10px 22px;
    cursor: pointer;
    background: #e5e7eb; /* gris claro */
    border: 1.5px solid #d1d5db;
    border-radius: 6px;
    font-weight: 600;
    font-size: 1rem;
    color: #374151; /* gris medio */
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    user-select: none;
  }

  .tab-btn:hover:not(.active) {
    background-color: #d1d5db;
  }

  .tab-btn.active {
    background: #3b82f6; /* azul */
    color: white;
    border-color: #2563eb;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
  }

  .tab-content {
    background: white;
    padding: 28px 30px;
    border: 1.5px solid #d1d5db;
    border-radius: 8px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
    max-width: 720px;
    margin: 0 auto;
    font-size: 1rem;
    line-height: 1.5;
    color: #374151;
  }
</style>
@endsection
