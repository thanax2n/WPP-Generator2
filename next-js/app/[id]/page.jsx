import { getPageById } from '@/app/services/pageService'
import { notFound } from 'next/navigation'

export default async function Page({ params }) {
    const { id } = await params
    const pageData = await getPageById(id)

    if (!pageData) {
        notFound()
    }

    const page = pageData?.page

    return (
        <>
            <h1 className="text-2xl font-semibold mb-4">{page.title}</h1>
            <div className="prose max-w-none prose-gray" dangerouslySetInnerHTML={{ __html: page.content || '' }} />
        </>
    )
}
