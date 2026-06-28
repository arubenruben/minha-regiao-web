import { Head, Link } from '@inertiajs/react';

export default function NotFound() {
    return (
        <>
            <Head title="Página não encontrada" />
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
                            Página não encontrada.
                        </h1>
                        <p className="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                            O caminho que procura não existe ou foi movido.
                        </p>
                        <p className="mt-4 text-sm italic text-[#706f6c] dark:text-[#A1A09A]">
                            "Nem todos os que erram o caminho estão
                            perdidos."
                        </p>
                    </div>

                    <Link
                        href="/"
                        className="inline-block rounded-sm border border-black bg-[#1b1b18] px-5 py-1.5 text-sm leading-normal text-white hover:border-black hover:bg-black dark:border-[#eeeeec] dark:bg-[#eeeeec] dark:text-[#1C1C1A] dark:hover:border-white dark:hover:bg-white"
                    >
                        Voltar ao início
                    </Link>
                </div>
            </div>
        </>
    );
}
