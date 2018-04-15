<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <a href="{site_url}/admin/user/profile/{usr_username}"><div class="avatar"><img src="{assets_url}/img/{usi_profile_image}" alt="user_profile_img" class="img-fluid rounded-circle" style="max-height: 65px"></div></a>
    <div class="title">
      <h1 class="h3"><a href="{site_url}/admin/user/profile/{usr_username}">{usi_firstname} {usi_lastname}</a></h1>
      <p>{usi_job}</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus-->
  <span class="heading">HUB</span>
  <ul class="list-unstyled">
    <li><a href="{site_url}/admin"><i class="icon-home"></i>Tableau de bord </a></li>
    <li><a href="#hub" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Mes Sites Web</a>
      <ul id="hub" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/hub/alb-impression">ALB Impression</a></li>
        <li><a href="{site_url}/admin/manager/hub/portfolio">Portfolio</a></li>
        <li><a href="{site_url}/admin/manager/hub/e-commerce">E-Commerce</a></li>
        <li><a href="{site_url}/admin/manager/hub/crm">Relation Clients</a></li>
      </ul>
    </li>
  </ul>
  <span class="heading">Gestion Entreprise</span>
  <ul class="list-unstyled">
    <li><a href="#documents" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Mes Documents</a>
      <ul id="documents" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/enterprise">Bloc Note</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">Téléchargements</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">Travaux</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">My custom docs...</a></li>
      </ul>
    </li>
    <li><a href="#projects" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Projets</a>
      <ul id="projects" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/enterprise">Nouveau</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">En cours</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">Terminés</a></li>
        <li><a href="{site_url}/admin/manager/enterprise">Gestionnaire</a></li>
      </ul>
    </li>
    <li><a href="#invoices" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Facturation</a>
      <ul id="invoices" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/">Nouveau</a></li>
        <li><a href="{site_url}/admin/manager/">Devis</a></li>
        <li><a href="{site_url}/admin/manager/">Factures</a></li>
        <li><a href="{site_url}/admin/manager/">Gestionnaire</a></li>
      </ul>
    </li>
    <li><a href="#finances" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Trésorerie</a>
      <ul id="finances" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/">Comptabilité</a></li>
        <li><a href="{site_url}/admin/manager/">Chiffre d'affaire</a></li>
        <li><a href="{site_url}/admin/manager/">Bénéfices</a></li>
        <li><a href="{site_url}/admin/manager/">Gestionnaire</a></li>
      </ul>
    </li>
    <li><a href="#messenger" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Messagerie</a>
      <ul id="messenger" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/">Nouveau</a></li>
        <li><a href="{site_url}/admin/manager/">Messages</a></li>
        <li><a href="{site_url}/admin/manager/">Notifications</a></li>
        <li><a href="{site_url}/admin/manager/">Chat</a></li>
        <li><a href="{site_url}/admin/manager/">Gestionnaire</a></li>
      </ul>
    </li>
    <li><a href="tables.html"><i class="icon-grid"></i>Calendrier</a></li>
    <li><a href="#users" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Utilisateurs</a>
      <ul id="users" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/users/">Tous</a></li>
        <li><a href="{site_url}/admin/users/visitors">Visiteurs</a></li>
        <li><a href="{site_url}/admin/users/clients">Clients</a></li>
        <li><a href="{site_url}/admin/users/employees">Salariés</a></li>
        <li><a href="{site_url}/admin/manager/users">Gestionnaire</a></li>
      </ul>
    </li>
  </ul>
  <span class="heading">Affichage</span>
  <ul class="list-unstyled">
    <li><a href="#items" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Contenu</a>
      <ul id="items" class="collapse list-unstyled ">
        <li><a href="{site_url}/admin/manager/items/pages"><i class="icon-grid"></i>Pages</a></li>
        <li><a href="{site_url}/admin/manager/items/menus"><i class="icon-grid"></i>Menus</a></li>
        <li><a href="{site_url}/admin/manager/items/articles"><i class="icon-grid"></i>Articles</a></li>
        <li><a href="{site_url}/admin/manager/items/widgets"><i class="icon-grid"></i>Widgets</a></li>
      </ul>
    </li>
    <li><a href="login.html"> <i class="icon-interface-windows"></i>Thèmes</a></li>
    <li><a href="login.html"> <i class="icon-interface-windows"></i>Extensions</a></li>
  </ul>
    <span class="heading">Configuration</span>
    <ul class="list-unstyled">
      <li><a href="#backups" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Versions</a>
        <ul id="backups" class="collapse list-unstyled ">
          <li><a href="{site_url}/admin/manager/">Sauvegardes</a></li>
          <li><a href="{site_url}/admin/manager/">Restaurations</a></li>
          <li><a href="{site_url}/admin/manager/">Gestionnaire</a></li>
        </ul>
      </li>
      <li><a href="#settings" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Paramètres</a>
        <ul id="settings" class="collapse list-unstyled ">
          <li><a href="{site_url}/admin/manager/">Administration</a></li>
          <li><a href="{site_url}/admin/manager/">Sites Web</a></li>
          <li><a href="{site_url}/admin/manager/">Utilisateurs</a></li>
          <li><a href="{site_url}/admin/manager/">Outils</a></li>
        </ul>
      </li>
    </ul>
    <ul class="list-unstyled">
      <li><a href="#documentation" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Documentation</a>
        <ul id="documentation" class="collapse list-unstyled ">
          <li><a href="{site_url}/admin/manager/">Démarrage rapide</a></li>
          <li><a href="{site_url}/admin/manager/">Hub</a></li>
          <li><a href="{site_url}/admin/manager/">Gestion Entreprise</a></li>
          <li><a href="{site_url}/admin/manager/">Affichage</a></li>
          <li><a href="{site_url}/admin/manager/">Configuration</a></li>
          <li><a href="{site_url}/admin/manager/">CMS</a></li>
        </ul>
      </li>
    </ul>
</nav>
