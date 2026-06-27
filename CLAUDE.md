# CLAUDE.md

Guidance for Claude Code when working in this repository.

> This repository also has an `AGENTS.md` with the same guidance, kept for
> other AI coding agents. If you update this file, update `AGENTS.md` too so
> they stay in sync.

## Project language

The primary language of this project is **European Portuguese (pt-PT)** —
this applies even when instructions are given in English. This affects two
different layers differently:

- **Code** (identifiers, comments, commit messages, docs like this one) is
  always written in **English**, regardless of the project's primary
  language.
- **Frontend output shown to the user** (UI copy, labels, messages, emails,
  SEO metadata) is primarily in **European Portuguese**, not Brazilian
  Portuguese — mind vocabulary/spelling differences (e.g. "ecrã" not "tela",
  "ficheiro" not "arquivo", pre-1990-agreement spellings where they differ).
  English is the secondary locale, not the default.

## Stack

Laravel (Inertia.js) + React (TypeScript), built with Vite. Inertia pages are
client-rendered React components, not Blade views.

## Internationalization (English + Portuguese)

This project supports multiple locales. Follow this split — do not mix the two
systems or duplicate strings across them.

- **UI copy (React/Inertia pages, components)** → `react-i18next`, with
  dictionaries at `resources/js/lang/en.json` and `resources/js/lang/pt.json`.
  Key by namespace/meaning (e.g. `dashboard.title`), never by the raw English
  sentence — English copy changes shouldn't break keys.
- **Server-generated text** (validation messages, Fortify auth emails, flash
  messages) → Laravel's standard `lang/en/*.php` and `lang/pt/*.php` files.
  Use Laravel's built-in translation helpers (`__()`, `trans()`); don't
  reinvent this layer.
- **Locale is decided server-side** and shared to every Inertia page as a
  `locale` prop via `HandleInertiaRequests::share()`, so `App::setLocale()`
  and the React i18n provider always agree on the active locale.
- **Routes are locale-prefixed** (e.g. `/en/...`, `/pt/...`) rather than
  cookie-only, to keep indexable URLs per locale for SEO.
- When adding any new user-facing string, add it to both `en.json` and
  `pt.json` (or both `lang/en` and `lang/pt` for server strings) in the same
  change — never leave a locale missing a key.
