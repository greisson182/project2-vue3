<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a
        class="navbar-brand"
        href="#"
      >Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>
      <div
        id="navbarSupportedContent"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link
              to="/"
              class="nav-link active"
              aria-current="page"
            >
              Home
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="products"
              class="nav-link"
            >
              Products
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="about"
              class="nav-link"
            >
              About
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="users"
              class="nav-link"
            >
              Users
            </router-link>
          </li>
        </ul>
        <form
          class="d-flex"
          role="search"
        >
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          >
          <button
            class="btn btn-outline-success"
            type="submit"
          >
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>
</template>