export const metadata = {
  title: "This is the home page",
  description: "Home page description"
}

export default function Home() {

  return (
    <>
      <h1 className="text-2xl font-semibold mb-4">Home</h1>
      <div className="prose max-w-none prose-gray" />
    </>
  )
}
