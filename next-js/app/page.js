import { getPageById } from '@/app/services/pageService'
import { notFound } from 'next/navigation'

const HOME_PAGE_SLUG = process.env.HOME_PAGE_SLUG

export const metadata = {
  title: "This is the home page",
  description: "Home page description"
}

export default async function Home() {
  const pageData = await getPageById(HOME_PAGE_SLUG)

  console.log('pageData', pageData)

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

