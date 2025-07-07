# MinhaRegião.pt

### About the Project

**Minha Região** is an open-source platform that consolidates electoral information from 1976 to 2021 for each of the 3,091 Portuguese parishes.

The project won the 2025 edition of the [Arquivo.pt Award](https://sobre.arquivo.pt/pt/conheca-os-vencedores-do-premio-arquivo-pt-2025/).

### This Repository

This repository contains the codebase for the web application powering the **MinhaRegião.pt** platform.

### Related Repositories

* [Minha Região Package](https://github.com/arubenruben/minha-regiao-package) – Python code supporting the data science and machine learning components of the Minha Região ecosystem.
* [Minha Região (Index)](https://github.com/arubenruben/minha-regiao) – Central repository that serves as an entry point and index for the overall project.

---

### How to Contribute

We welcome contributions from developers, data scientists, and civic tech enthusiasts! This platform was developed as a side project with the sole aim of democratizing access to electoral data across Portuguese districts, cities, and parishes.

If you believe that local regions play a key role in Portugal’s future, feel free to get involved.

#### What's Already Implemented?

* User interface to explore regional ("Autárquicas") election data from 1976 to 2021.
* Optimized data model for handling historical electoral data.
* Initial version (v0.0.1) of the REST API, including a [Swagger UI](#) for exploration.

#### Features Suspended Under the "Only Publish What My Students Can Inspect" Philosophy

* **Chatbot navigation** – Currently paused due to lack of a proper UI and subpar results.
* **News indexing by locality** – Suspended due to issues where news from unrelated localities were being shown. Further bug fixes are needed.

#### Major Features Still Missing

* **\[Web Developer]** Interface to explore other types of elections (Parliamentary / *Legislativas*, Presidential / *Presidenciais*, European / *Europeias*).
* **\[Backend Engineer]** API authentication using Bearer tokens for enhanced security and reliability.
* **\[QA Engineer]** A test suite using PHPUnit and Playwright for robust testing coverage.
* **\[DevOps Contributor]** CI/CD improvements using GitHub Actions.

For a full list of pending features and their development status, check our [Project Board](https://github.com/users/arubenruben/projects/10).

---

### About Us

The team behind the 2025 Arquivo.pt submission was led by [Rúben Almeida](https://www.linkedin.com/in/almeida-ruben/), under the academic supervision of [Ricardo Campos](https://www.di.ubi.pt/~rcampos/) and [Sérgio Nunes](https://sigarra.up.pt/feup/pt/func_geral.formview?p_codigo=310021).

Minha Região is a non-profit initiative. All infrastructure, hosting, and ongoing maintenance are funded by the author, Rúben Almeida.