import { Head } from '@inertiajs/react';

const LINKS = [
    {
        href: 'https://huggingface.co/minharegiao',
        label: 'Hugging Face',
        icon: '/hugging-face-logo.png',
    },
    {
        href: 'https://www.linkedin.com/company/minha-região',
        label: 'LinkedIn',
        icon: '/linkedin-logo.png',
    },
];

export default function Maintenance() {
    return (
        <>
            <Head title="Em manutenção" />
            <div className="flex min-h-screen flex-col items-center justify-center bg-[#FDFDFC] p-6 dark:bg-[#0a0a0a]">
                <div className="flex w-full max-w-sm flex-col items-center gap-6 rounded-lg border border-[#19140035] bg-white p-10 text-center shadow-sm dark:border-[#3E3E3A] dark:bg-[#161615]">
                    <div className="flex items-center gap-3">
                        <img
                            src="/logo-minha-regiao.png"
                            alt="Minha Região"
                            className="h-24 w-24 rounded-md object-cover"
                        />
                        <span className="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">
                            Minha Região
                        </span>
                    </div>

                    <div>
                        <h1 className="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                            Estaremos de volta brevemente.
                        </h1>
                        <p className="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                            Estamos a efetuar manutenção ao site e voltaremos
                            em breve. Obrigado pela paciência.
                        </p>
                        <p className="mt-2 text-xs text-[#a1a09a]">
                            We're currently performing maintenance and will be
                            back soon. Thanks for your patience.
                        </p>
                    </div>

                    <div className="flex items-center gap-4">
                        {LINKS.map(({ href, label, icon }) => (
                            <a
                                key={href}
                                href={href}
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label={label}
                                className="opacity-80 transition-opacity hover:opacity-100"
                            >
                                <img src={icon} alt={label} className="h-8 w-8" />
                            </a>
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
}
