<style media="screen">
  * {
    font-size: 1.2rem;
  }
  form {
    width: 100%;
    max-width: 600px;
  }
  div {
    margin: 20px;
  }
  div, label {
    display: block;
  }
  input {
    border-radius: 7px;
    padding: 10px;
    width: 100%;
  }
  button {
    padding: 10px;
    background: #adadad;
  }
  .arc {
    font-weight: bold;
  }
</style>
<form class="" action="index.html" method="post">
  <div class="">
    <div class="">
      <label for="id-cajero">Numero de cajero</label>
      <input id="id-cajero" type="text" name="" value="" placeholder="id del cajero">
    </div>
    <div class="">
      <label for="">Direccion de cajero</label>
      <input type="text" name="" value="" placeholder="Direccion">
    </div>
    <div class="">
      <label for="">Fecha y hora</label>
      <input type="datetime-local" name="" value="" placeholder="Direccion">
    </div>
    <div class="">
      <label for="" class="arc">
        Simulación de aprovisionamiento de cajero 24%
      </label>

    </div>
    <div class="">
      <button type="submit" name="button">
        Guardar
      </button>
    </div>
  </div>
</form>
