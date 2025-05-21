import Hello from '@/app/components/Hello'

export const metadata = {
  title: "This is the home page",
  description: "Home page description"
}

export default function Home() {

  return (
    <>
      <h1 className="text-3xl">Hello</h1>

      <Hello />
    </>
  );
}
