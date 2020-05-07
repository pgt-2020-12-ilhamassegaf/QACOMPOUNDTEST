<div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">

          <a href="javascript:void(0)" class="simple-text logo-normal">
           <center>QA Compound Test</center>
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="/dashboard">
              <i class="tim-icons icon-atom"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(auth()->user()->role == 'Admin')

          <li>
            <a href="/siswa">
              <i class="tim-icons icon-single-02"></i>
              <p>Hasil Tes</p>
            </a>
          </li>

          <li>
            <a href="/dosen">
              <i class="tim-icons icon-badge"></i>
              <p>Karyawan</p>
            </a>
          </li>
          @endif
          @if(auth()->user()->role == 'Operator')

          <li>
            <a href="/siswa">
              <i class="tim-icons icon-single-02"></i>
              <p>Hasil Tes</p>
            </a>
          </li>
          @endif

        </ul>
      </div>
    </div>
